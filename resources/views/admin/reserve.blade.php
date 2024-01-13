<div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                               
                                <div class="small text-white"><i id="angle-icon" class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">Total admin
                                <h2>{{$admin}}</h2>
                                
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                 <a class="small text-white stretched-link" href="{{url('permission')}}">Permission</a>
                                    <div class="small text-white clickable-icon"><i class="fas fa-angle-right"></i>
                                        <div class="admin-details">
                                            <!-- Admin Details Content -->
                                            <h2>{{Auth::user()->name}}</h2>
                                                @foreach($pcregisters as $pcregister)
                                                    <p>PC Register ID: {{ $pcregister->user_id }}</p>
                                                    <!-- Display other details as needed -->
                                                @endforeach
                                         </div>
                                    </div>
                            </div>
                               
                        </div>
                    </div>


                        
                    <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">total student pc
                                    <h2>{{$studentpc}}</h2>
                                    
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Total Staff pc
                                <h2>{{$teacherpc}}</h2>
                                <a href="{{url('auth.register')}}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                           
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('register')}}" >Register</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Total Guest pc
                                <h2>{{$otherpc}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>