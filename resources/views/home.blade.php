{{-- @extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col s12">
        <div class="card">
            <div class="card-content ">
                <span class="card-title"><h2>Company List</h2></span>
            <button class="btn blue darken-1" onclick="addNew()" type="button">Create new company</button>
            </div>
            <!-- Dropdown Create New Company -->
            <div class="card-content " id="add-new"  style="display: none;">
                <form enctype="multipart/form-data" action="{{route('companies.store')}}" method="POST">
                    @csrf
                    <div class="input-field col s12">
                        <input type="text" name="name" id="name" class="" value="{{old('name')}}">
                        <label for="name">Name</label>
                        @if ($errors->has('name'))
                            <div class="error">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="address" id="address" class="" value="{{old('address')}}">
                        <label for="name">Address</label>
                        @if ($errors->has('address'))
                            <div class="error">{{$errors->first('address')}}</div>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="website" id="website" class="" value={{old('website')}}>
                        <label for="name">Website</label>
                        @if($errors->has('website'))
                            <div class="error">{{$errors->first('website')}}</div>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="email" id="email" class="" value="{{old('email')}}">
                        <label for="name">Email</label>
                        @if ($errors->has('email'))
                            <div class="error">{{$errors->first('email')}}</div>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <span><h3>Logo</h3></span>
                        <input type="file" name="logo" id="logo">
                        @if ($errors->has('logo'))
                            <div class="error">{{$errors->first('logo')}}</div>
                        @endif
                        <div class="error"></div>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div> <!-- End Add New Company -->

            <!-- Show & Edit Companies -->
            <div class="card-content">
                <table class = "striped bordered">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Show Companies -->
                        @foreach($companies as $company)
                            <tr class="show-company" id="{{$company->id}}">
                                <td><img src="{{$company->logo}}"  alt="">
                                    @if ($errors->has('editLogo'))
                                        @foreach ($errors->all() as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    @endif

                                </td>
                                <td><a href="{{route('companies.show', $company->id)}}">{{$company->name}}</a></td>
                                <td>{{$company->address}}</td>
                                <td>{{$company->website}}</td>
                                <td>{{$company->email}}</td>
                                <td>
                                    <button onclick="openEdit({{$company->id}})" class="btn grey">
                                        <i class="material-icons left">edit</i>
                                        <span>Edit</span>
                                    </button>
                                    <form method="POST" action="{{route('companies.destroy', $company)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn red" type="submit">
                                            <i class="material-icons left">delete</i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr><!-- End Show Company -->

                            <!-- Edit Companies -->
                            <tr class="edit-company" id="edit{{$company->id}}" style="display: none;" >
                                <form method="POST" enctype="multipart/form-data" action="{{route('companies.update', $company)}}">
                                    @csrf
                                    @method('patch')
                                    <td><img src="{{$company->logo}}" style="max-width: 250px; max-height: 250px;" alt="">
                                        <input  type="file" name="editLogo">
                                    </td>
                                    <td><input type="text" name="editName" value="{{$company->name}}"></td>
                                    <td><input type="text" name="editAddress" value="{{$company->address}}"></td>
                                    <td><input type="text" name="editWebsite" value="{{$company->website}}"></td>
                                    <td><input type="text" name="editEmail" value="{{$company->email}}"></td>
                                    <td>
                                        <button class="btn ">
                                            <i class="material-icons left">send</i>
                                            <span>Submit</span>
                                        </button>
                                    </form>
                                        <button class="btn red" type="submit">
                                            <i class="material-icons left">delete</i>
                                            <span>Delete</span>
                                        </button>
                                    </td>
                            </tr><!-- End Edit -->
                        @endforeach<!-- End Show & Edit -->
                    </tbody>
                </table>
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

    function openEdit(company){
        let openEdit = document.getElementById(company)
        let edit = document.getElementById(`edit${company}`)

        openEdit.style.display = "none"
        edit.style.display = "table-row"
    }

</script>
@endsection --}}
