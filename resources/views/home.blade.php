@extends('layouts.templateAuth')

@section('content')
<style>


#btnmenu{
    display:flex;
    align-items:center;
    justify-content: center;
    transition-duration:0.25s;
    font-size:large;
    background-color:#B26929;
    opacity:0.8;
}

#btnmenu:hover{
    background-color:black;
    transition-duration:0.25s;
}

</style>
<div class="row" style="height:500px;">
    
    <div class="col-sm-6" height="100%" id="btnmenu" onclick="window.open('{{url("scan")}}', '_blank').focus()">
        <h1 class="ctbtn">Pesan Sekarang</h1>
    </div>
    <div class="col-sm-6" height="100%" id="btnmenu" onclick="window.open('{{url("login")}}', '_blank').focus()">
        <h1 class="ctbtn">Login</h1>
    </div>
    <!-- end of col-sm-12 -->
</div>
@endsection



