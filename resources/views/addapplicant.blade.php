<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>


</body>

</html>
@extends('layout.master')

@section('title')
   OPLAN EVISA | Welcome
@endsection

@section('css')
    <style type="text/css">
        div.dt-buttons {
            float: right;
            
        }
    
    </style>
@endsection

@section('content')
<div class=" middlebox text-center animated fadeInDown" style="width: 100%;">
        {{-- <h2 class="font-bold m-b-none m-t-xl" style="">Welcome to</h2>
        <h1 class="font-bold m-t-none text-black">DLOS Clearance</h1> --}}
        <h3 class="font-bold m-t-none text-black">APPLICATION</h3>

        <div class="wrapper wrapper-content animated fadeIn">

          <div class="p-w-md m-t-sm">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="ibox">
                          <div class="text-center">
                              <button type="button" class="btn btn-primary pull-right" id="adduser" >
                                  ADD USER
                              </button>
                                  </div>
                               
                                  <form id="search_form">
                                      <div class="row">
                                          <div class="col-sm-4">
                                              <div class="form-group">
                                                  <input type="text" id="station" name="station" value="" placeholder="Search Station" class="form-control">
                                              </div>
                                          </div>
                                    
                                          <!-- <div class="col-sm-4">
                                              <div class="form-group">
                                                  <label class="col-form-label" for="quantity">Search User Name</label>
                                                  <input type="text" id="user_name" name="user_name" value="" placeholder="user_name" class="form-control">
                                              </div>
                                          </div> -->
                                          <div class="col-sm-12 ">
                                              <button type="button" id ="btn_search"class="btn btn-w-m btn-success pull-right">Search</button>
                                              <button type="button" id="btn_clear" class="btn btn-w-m btn-success pull-right">Clear</button>
                                          </div>
                                      </div>
                              </form>

                          <div class="ibox-content">   

                              <div class="table-responsive">
    <table class="fixed table table-striped" id="applicant_tbl">
                      <thead class="fixed">
                        <tr>
                          <th>FIRST NAME</th>       
                          <th>MIDDLE NAME</th>   
                          <th>LAST NAME</th>              
                          <th>QLR</th>  
                          <th>GENDER</th>   
                          <th>Date of Birth</th>   
                          <th>EMAIL</Th>
                          <th>EDIT</Th>
                       </tr>
                      </thead>
                                      <tbody>
                                     
                                      </tbody>
                                  </table>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
      @endsection

      @section('scripts')
      <script >


        $(document).ready(function(){

            fetchapplicant();

            function fetchapplicant()
            {
                $.ajax({
                    type:"GET",
                    url:'/addapplicant',
                    dataType:'json',
                    success: function (response) {
                        console.log(response.students);
                        $('tbody').html("");
                        $.each(response.applicants, function (key, item){
                        $('tbody').append('<tr>\
                        <td>'+item.id+'</td>\
                        <td>'+item.first_name+'</td>\
                        <td>'+item.middle_name+'</td>\
                        <td>'+item.last_name+'</td>\
                        <td>'+item.qualifier+'</td>\
                        <td>'+item.gender+'</td>\
                        <td>'+item.dateofbirth+'</td>\
                        <td><button type="button" value="'+item.id+'" class="edit_applicant btn btn-primary"></td>\
                        </tr>');
                        });
                    }
                });
            }
        });
    
        </script>