
            <div class="sidebar">
               <div class="form-inline">
                  <div class="input-group" data-widget="sidebar-search">
                     <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                     <div class="input-group-append">
                        <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                        </button>
                     </div>
                  </div>
               </div>
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link {{(Request::segment(2) == 'dashboard')?'active':''}}">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item {{(Request::segment(2) == 'users')?'menu-open':''}}">
                        <a href="#" class="nav-link {{(Request::segment(2) == 'users')?'active':''}}">
                           <i class="nav-icon fas fa-user"></i>
                           <p>
                              Users
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{route('users.index')}}" class="nav-link {{((Request::segment(2) == 'users') && (Request::segment(3) == ''))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Users List</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{route('users.create')}}" class="nav-link {{((Request::segment(2) == 'users') && (Request::segment(3) == 'create'))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add User</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('colab.index')}}" class="nav-link {{(Request::segment(2) == 'colab')?'active':''}}">
                           <i class="nav-icon fa fa-cog"></i>
                           <p>
                              Colab
                           </p>
                        </a>
                     </li>
                     <li class="nav-item {{(Request::segment(2) == 'questions')?'menu-open':''}}">
                        <a href="#" class="nav-link {{(Request::segment(2) == 'questions')?'active':''}}">
                           <i class="nav-icon fas fa-user"></i>
                           <p>
                              Questions
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{route('questions.index')}}" class="nav-link {{((Request::segment(2) == 'questions') && (Request::segment(3) == ''))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Questions List</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{route('questions.create')}}" class="nav-link {{((Request::segment(2) == 'questions') && (Request::segment(3) == 'create'))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Question</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('settings.index')}}" class="nav-link {{(Request::segment(2) == 'settings.index') ? 'active':''}}">
                            <i class="nav-icon fa fa-cog"></i>
                           <p>
                              General Settings
                           </p>
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
