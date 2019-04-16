@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col s12">
           <div class="card">
               <div class="card-content ">
                   <span class="card-title">Company List</span>
               <button class="btn blue darken-1" onclick="addNew()" type="button">Create new company</button>
               </div>
               <div class="card-content " id="add-new"  style="display: none;">
                    <form action="{{route('companies.store')}}" method="POST">
                        @csrf
                        <div class="input-field col s12">
                            <input type="text" name="name" id="name" class="">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="address" id="address" class="">
                            <label for="name">Address</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="website" id="website" class="">
                            <label for="name">Website</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="email" id="email" class="">
                            <label for="name">Email</label>
                        </div>
                        <button type="submit" class="btn">Submit</button>
                    </form>
               </div>
                <div class="card-content">
                    <table class = "striped bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Email</th>
                                <th>Admin</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>Mahesh Parashar</td>
                                <td>123 SIlver Road, Bristol, BS42 62Y</td>
                                <td>https://facebook.com</td>
                                <td>testing123@testing.com</td>
                                <td>
                                    <button class="btn grey">
                                        <i class="material-icons left">edit</i>
                                        <span>Edit</span>
                                    </button>
                                    <button class="btn red">
                                        <i class="material-icons left">delete</i>
                                        <span>Delete</span>

                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
           </div>
       </div>
    </div>
</div>
@endsection


@section('script')
<script>
    function addNew(){
        let addNew = document.getElementById('add-new')
        if(addNew.style.display == "none"){
            addNew.style.display = "block"
        }else{
            addNew.style.display = "none"
        }
    }


</script>
@endsection
