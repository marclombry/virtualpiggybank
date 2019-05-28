@extends('layouts.app')
@section('content')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, 'draggable');
    });

    //let data = document.getElementById("add_money").value
    //let url = '{{ route('add_money') }}'


    $(function(){

        $('#myform').submit(function(e){
            e.preventDefault();
            var  money = $('#addmoney').val();
            alert(money);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"{{ route('add_money') }}",
                method:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "money":money
                },
                success:function(result)
                {

                    $('#solde').html(result+' <i class="material-icons">euros</i>');
                },
                error:function(error){

                }
            });
        });


    })

</script>

<ul id="slide-out" class="sidenav light-green">
  <li>
        <div class="user-view">
            <div class="background">
                <i class="person"></i>
            </div>
            <span class=" name">
                    <i class="material-icons">person</i>  {{ $users->name }}</span>
            <span class=" email">
                    <i class="material-icons">email</i>  {{ $users ->email}}</span>
        </div>
  </li>
  <li>
    <form id ="myform"  method="POST" action="/add_money">
        @csrf
        <div>
            <label for="addmoney">Ajouter<label>
            <input id="addmoney" type ="number" name="addmoney">

        </div>

    </form>
  </li>
</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>


<div class="row">
    <div class="col s4"></div>
    <div class="col s8">
        <p style="font-size:28px;" id="solde" class="light-green-text">Votre solde : {{ $somme }} <i class="material-icons">euros</i></p>

    </div>
</div>

@endsection
