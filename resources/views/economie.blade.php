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

                    $('#solde').html('<p style="font-size:28px;" id="solde" class="light-green-text">Votre solde : '+ result +' <i class="material-icons">euros</i></p>');
                },
                error:function(error){

                }
            });
        });


    })

</script>

<ul id="slide-out" class="sidenav blue-grey">
  <li>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Profil</span>
                        <p><i class="material-icons">person</i>  {{ $users->name }}</p>
                        <p><i class="material-icons">email</i>  {{ $users ->email}}</p>
                    </div>
                </div>
            </div>
        </div>
  </li>
  <li>
    <form id ="myform"  method="POST" action="/add_money">
        @csrf
        <div class="white-text">
            <p class="m6"> Monnaie
                <input id="addmoney" type ="text" name="addmoney" placeholder="Add money">
            </p>
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
