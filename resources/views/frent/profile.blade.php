@extends('layouts.frent')

@section('content')
    <div class="container">
        <header><h1>My Account</h1></header>
        <div class="row">
            <div class="col-md-8">
                <section id="my-account">
                    <ul class="nav nav-tabs" id="tabs">
                        <li class="active"><a href="#tab-profile" data-toggle="tab">Profile</a></li>
                     
                        <li><a href="#tab-change-password" data-toggle="tab">Change Password</a></li>
                    </ul><!-- /#my-profile-tabs -->
                    <div class="tab-content my-account-tab-content">
                        <div class="tab-pane active" id="tab-profile">
                            <section id="my-profile">
                                <header><h3>My Profile</h3></header>
                                <div class="my-profile">
                                    <figure class="profile-avatar">
                                        <div class="image-wrapper"><img src="{{ url('images/' . $etudiant->photo) }}"></div>
                                    </figure>
                                    <article>
                                        <form method="POST" action="{{ route('updateetudin') }}" id="edit_etudiant_form" name="edit_etudiant_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
         
         <input name="id" type="hidden" value="{{$etudiant->id}}">
                                        <div class="table-responsive">
                                            <table class="my-profile-table">
                                                <tbody>
                                                <tr>
                                                    <td class="title"> Name</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="name" value="{{$etudiant->name}}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td class="title"> Prenom</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="prenom" value="{{$etudiant->prenom}}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>

 
                                                 <tr>
                                                    <td class="title"> Telephone</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="telephone" value="{{$etudiant->telephone}}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="title"> Adresse</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="adresse" value="{{$etudiant->adresse}}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>


                                                 <tr>
                                                    <td class="title"> Email</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="email" value="{{$etudiant->email}}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>


                                             
                                             
                                                <tr>
                                                    <td class="title">Change Photo</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="file" name="photo">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn pull-right">Save Changes</button>
                                             </form>
                                    </article>
                                </div><!-- /.my-profile -->
                            </section><!-- /#my-profile -->
                        </div><!-- /tab-pane -->
                       
                        <div class="tab-pane" id="tab-change-password">
                            <section id="password">
                                <header><h3>Change Password</h3></header>
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-4">
                                        <p>
                                            
                                        </p>
                                         <form method="POST" action="{{ route('changepasse') }}" id="edit_etudiant_form" name="edit_etudiant_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="current-password">Current Password</label>
                                                <input type="password" class="form-control" name="current_password">
                                            </div>
                                            <div class="form-group">
                                                <label for="new-password">New Password</label>
                                                <input type="password" class="form-control" name="new_password">
                                            </div>
                                            <div class="form-group">
                                                <label for="repeat-new-password">Repeat New Password</label>
                                                <input type="password" class="form-control" name="repeat_new_password">
                                            </div>
                                            <button type="submit" class="btn pull-right">Change Password</button>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div><!-- /.tab-content -->
                </section>
            </div>

            <!--SIDEBAR Content-->
            <div class="col-md-4">
                <div id="page-sidebar" class="sidebar">
                    <aside class="news-small" id="news-small">
                        <header>
                            <h2>Related News</h2>
                        </header>
                        <div class="section-content">
                            @foreach($evenment as $key => $evet)
                            @if($key < 8)
                            @if($evet->date >= Carbon\Carbon::now()->format('Y-m-d') )
                            <article>
                                <figure class="date"><span class="glyphicon glyphicon-calendar"></span>{{$evet->date}}</figure>
                                <header><a href="#">{{$evet->Name}}</a></header>
                            </article><!-- /article -->
                            @endif
                            @endif
                              @endforeach
                        </div><!-- /.section-content -->
                      
                    </aside><!-- /.news-small -->
                </div><!-- /#sidebar -->
            </div><!-- /.col-md-4 -->
            <!-- end SIDEBAR Content-->




        </div><!-- /.row -->
    </div><!-- /.container -->


    @endsection