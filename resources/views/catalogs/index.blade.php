@extends('app')

@section('title', 'game')

@section('game_theme')

@section('game_contents')
<a class="btn btn-sm btn-success" href=" {{ url('catalogs/create/') }} ">新增游戲</a>
<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ url('catalogs/senior') }}">資深遊戲</a>
        <form action="{{ url('catalogs/position') }}" method='POST'>
            {!! Form::label('pos', '選取位置：') !!}
            {!! Form::select('pos', $type, ['class' => 'form-control']) !!}
            <input class="btn btn-default" type="submit" value="查詢" />
            @csrf
        </form>
</div>
<style>
    .panel{
    font-family: 'Raleway', sans-serif;
    padding: 0;
    border: none;
    box-shadow: 0 0 10px rgba(0,0,0,0.08);
}
.panel .panel-heading{
    background: #535353;
    padding: 15px;
    border-radius: 0;
}
.panel .panel-heading .btn{
    color: #fff;
    background-color: #000;
    font-size: 14px;
    font-weight: 600;
    padding: 7px 15px;
    border: none;
    border-radius: 0;
    transition: all 0.3s ease 0s;
}
.panel .panel-heading .btn:hover{ box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); }
.panel .panel-heading .form-horizontal .form-group{ margin: 0; }
.panel .panel-heading .form-horizontal label{
    color: #fff;
    margin-right: 10px;
}
.panel .panel-heading .form-horizontal .form-control{
    display: inline-block;
    width: 80px;
    border: none;
    border-radius: 0;
}
.panel .panel-heading .form-horizontal .form-control:focus{
    box-shadow: none;
    border: none;
}
.panel .panel-body{
    padding: 0;
    border-radius: 0;
}
.panel .panel-body .table thead tr th{
    color: #fff;
    background: #8D8D8D;
    font-size: 17px;
    font-weight: 700;
    padding: 12px;
    border-bottom: none;
}
.panel .panel-body .table thead tr th:nth-of-type(1){ width: 120px; }
.panel .panel-body .table thead tr th:nth-of-type(3){ width: 50%; }
.panel .panel-body .table tbody tr td{
    color: #555;
    background: #fff;
    font-size: 15px;
    font-weight: 500;
    padding: 13px;
    vertical-align: middle;
    border-color: #e7e7e7;
}
.panel .panel-body .table tbody tr:nth-child(odd) td{ background: #f5f5f5; }
.panel .panel-body .table tbody .action-list{
    padding: 0;
    margin: 0;
    list-style: none;
}
.panel .panel-body .table tbody .action-list li{ display: inline-block; }
.panel .panel-body .table tbody .action-list li a{
    color: #fff;
    font-size: 13px;
    line-height: 28px;
    height: 28px;
    width: 33px;
    padding: 0;
    border-radius: 0;
    transition: all 0.3s ease 0s;
}
.panel .panel-body .table tbody .action-list li a:hover{ box-shadow: 0 0 5px #ddd; }
.panel .panel-footer{
    color: #fff;
    background: #535353;
    font-size: 16px;
    line-height: 33px;
    padding: 25px 15px;
    border-radius: 0;
}
.pagination{ margin: 0; }
.pagination li a{
    color: #fff;
    background-color: rgba(0,0,0,0.3);
    font-size: 15px;
    font-weight: 700;
    margin: 0 2px;
    border: none;
    border-radius: 0;
    transition: all 0.3s ease 0s;
}
.pagination li a:hover,
.pagination li a:focus,
.pagination li.active a{
    color: #fff;
    background-color: #000;
    box-shadow: 0 0 5px rgba(0,0,0,0.4);
}
</style>
<div class="panel">
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>名稱</th>
                                <th>廠商名稱</th>
                                <th>價格</th>
                                <th>評價</th>
                                <th>發行日期</th>
                                <th>硬手</th>
                                <th>遊戲類型</th>
                                <th>操作 1</th>
                                <th>操作 2</th>
                                <th>操作 3</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($catalogs as $catalog)
                            <tr>
                                <td>{{$catalog->id }}</td>
                                <td>{{$catalog->name }}</td>
                                <td><a href="{{ url('manufacturers/show', ['id'=>$catalog->manufacturers->id]) }}">{{$catalog->manufacturers->name}}-{{($catalog->manufacturers->id)}}</a></td>
                                <td>{{$catalog->price }}</td>
                                <td>{{$catalog->evaluaation }}</td>
                                <td>{{$catalog->issue_date }}</td>
                                <td>{{$catalog->revenue }}</td>
                                <td>{{$catalog->game_type }}</td>
                                <td ><a id="btn0" href="{{ url('catalogs/show', ['id'=>$catalog->id]) }}"class="btn btn-sm btn-success"><i class="fa fa-search">view</i></a></td>
                                <td >
                                    <form id="btn1" action="{{ url('catalogs/delete', ['id' => $catalog->id]) }}" method="post">
                                        <input id="btn1"  class="btn btn-danger"  type="submit" value="delete" />
                                        @method('delete')
                                        @csrf
                                    </form> 
                                </td>  
                                <td><a id="btn3" href="{{url('catalogs/edit', ['id' => $catalog->id])}}"class="btn btn-primary"><i class="fa fa-pencil-alt">edit</i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $catalogs->links() }}
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
