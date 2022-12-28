
<style>

    div > ul { display: none; }
    div:hover > ul {display: block; background: #f9f9f9; border-top: 1px solid purple;}
    div:hover > ul > li { padding: 5px; border-bottom: 1px solid #4f4f4f;}
    div:hover > ul > li:hover { background: white;}
    div:hover > ul > li:hover > a { color: red; }
</style>



<div>
  Select
  <ul>
    <li><a class="btn btn-primary" href="{{ url('/') }} " class="ml-1 underline">
        所有游戲
        </a></li>
    <li><a class="btn btn-primary" href="{{ url('manufacturers/') }} " class="ml-1 underline">
        所有游戲公司
        </a></li>
  </ul>
</div>