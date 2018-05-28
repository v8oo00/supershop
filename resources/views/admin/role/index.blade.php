@extends('layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Browse<small>HomeUsers</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                  Show the information of foreground users
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap homeusers" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Role</th>
                      <th>Desc</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody v-for="item in items">
                        @foreach($roles as $role )
                            <tr>
                                <td>{{$role['id']}}</td>
                                <td>{{$role['r_name']}}</td>
                                <td>{{$role['desc']}}</td>
                                <td>
                                    <a href="{{action('Admin\RoleController@edit',$role['id'])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="{{action('Admin\RoleController@delete',$role['id'])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>


              </div>
            </div>
          </div>
@endsection

@section('js')


@endsection