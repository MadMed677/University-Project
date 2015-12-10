<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        @include('includes.docs.api.v1.head')
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-3" id="sidebar">
                    <div class="column-content">
                        <div class="search-header">
                            <img src="/assets/docs/api.v1/img/f2m2_logo.svg" class="logo" alt="Logo" />
                            <input id="search" type="text" placeholder="Search">
                        </div>
                        <ul id="navigation">

                            <li><a href="#introduction">Introduction</a></li>

                            

                            <li>
                                <a href="#Activity">Activity</a>
                                <ul>
									<li><a href="#Activity_index">index</a></li>

									<li><a href="#Activity_store">store</a></li>

									<li><a href="#Activity_destroy">destroy</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#User">User</a>
                                <ul>
									<li><a href="#User_index">index</a></li>

									<li><a href="#User_store">store</a></li>

									<li><a href="#User_logout">logout</a></li>

									<li><a href="#User_profile">profile</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#Tag">Tag</a>
                                <ul>
									<li><a href="#Tag_index">index</a></li>

									<li><a href="#Tag_store">store</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#Category">Category</a>
                                <ul>
									<li><a href="#Category_index">index</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#Dashboard">Dashboard</a>
                                <ul>
									<li><a href="#Dashboard_index">index</a></li>
</ul>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col-9" id="main-content">

                    <div class="column-content">

                        @include('includes.docs.api.v1.introduction')

                        <hr />

                                                

                                                <a href="#" class="waypoint" name="Activity"></a>
                        <h2>Activity</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Activity_index"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>index</h3></li>
                            <li>api/v1/activities</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Display a listing of the activities.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc">GET /activities/</p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/activities" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Activity_store"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>store</h3></li>
                            <li>api/v1/activities</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Store a newly created resource in storage.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/activities" type="POST">
                          <div class="endpoint-paramenters">
                            <h4>Parameters</h4>
                            <ul>
                              <li class="parameter-header">
                                <div class="parameter-name">PARAMETER</div>
                                <div class="parameter-type">TYPE</div>
                                <div class="parameter-desc">DESCRIPTION</div>
                                <div class="parameter-value">VALUE</div>
                              </li>
                                                           <li>
                                <div class="parameter-name">request->category</div>
                                <div class="parameter-type">int</div>
                                <div class="parameter-desc">The category id</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="request->category">
                                </div>
                              </li>
                             <li>
                                <div class="parameter-name">request->hours</div>
                                <div class="parameter-type">float</div>
                                <div class="parameter-desc">The count of hours</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="request->hours">
                                </div>
                              </li>
                             <li>
                                <div class="parameter-name">request->location['name']</div>
                                <div class="parameter-type">string</div>
                                <div class="parameter-desc">Location name</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="request->location['name']">
                                </div>
                              </li>
                             <li>
                                <div class="parameter-name">request->location['latitude']</div>
                                <div class="parameter-type">float</div>
                                <div class="parameter-desc">Location latitude</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="request->location['latitude']">
                                </div>
                              </li>
                             <li>
                                <div class="parameter-name">request->location['longitude']</div>
                                <div class="parameter-type">float</div>
                                <div class="parameter-desc">Location longitude</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="request->location['longitude']">
                                </div>
                              </li>

                            </ul>
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Activity_destroy"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>DELETE</h2></li>
                            <li><h3>destroy</h3></li>
                            <li>api/v1/activities/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Remove the activity from storage.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/activities/{id}" type="DELETE">
                          <div class="endpoint-paramenters">
                            <h4>Parameters</h4>
                            <ul>
                              <li class="parameter-header">
                                <div class="parameter-name">PARAMETER</div>
                                <div class="parameter-type">TYPE</div>
                                <div class="parameter-desc">DESCRIPTION</div>
                                <div class="parameter-value">VALUE</div>
                              </li>
                                                           <li>
                                <div class="parameter-name">id</div>
                                <div class="parameter-type">int</div>
                                <div class="parameter-desc">The activity id</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="id">
                                </div>
                              </li>

                            </ul>
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="DELETE"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="User"></a>
                        <h2>User</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="User_index"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>index</h3></li>
                            <li>api/v1/auth</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Display a listing of the users.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/auth" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="User_store"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>store</h3></li>
                            <li>api/v1/auth</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Store a newly created resource in storage.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/auth" type="POST">
                          <div class="endpoint-paramenters">
                            <h4>Parameters</h4>
                            <ul>
                              <li class="parameter-header">
                                <div class="parameter-name">PARAMETER</div>
                                <div class="parameter-type">TYPE</div>
                                <div class="parameter-desc">DESCRIPTION</div>
                                <div class="parameter-value">VALUE</div>
                              </li>
                                                           <li>
                                <div class="parameter-name">request->login</div>
                                <div class="parameter-type">string</div>
                                <div class="parameter-desc">get user login</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="request->login">
                                </div>
                              </li>
                             <li>
                                <div class="parameter-name">request->password</div>
                                <div class="parameter-type">string</div>
                                <div class="parameter-desc">get user password</div>
                                <div class="parameter-value">
                                    <input type="password" class="parameter-value-text" name="request->password">
                                </div>
                              </li>

                            </ul>
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="User_logout"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>logout</h3></li>
                            <li>api/v1/user/logout</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Logout user</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/user/logout" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="User_profile"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>profile</h3></li>
                            <li>api/v1/user/profile</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Get only 30 user activities and order them by 'desc'</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/user/profile" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="Tag"></a>
                        <h2>Tag</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Tag_index"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>index</h3></li>
                            <li>api/v1/tags</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Display a listing of the tags.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/tags" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Tag_store"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>store</h3></li>
                            <li>api/v1/tags</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Save tags array.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/tags" type="POST">
                          <div class="endpoint-paramenters">
                            <h4>Parameters</h4>
                            <ul>
                              <li class="parameter-header">
                                <div class="parameter-name">PARAMETER</div>
                                <div class="parameter-type">TYPE</div>
                                <div class="parameter-desc">DESCRIPTION</div>
                                <div class="parameter-value">VALUE</div>
                              </li>
                                                           <li>
                                <div class="parameter-name">request->tags[]</div>
                                <div class="parameter-type">array</div>
                                <div class="parameter-desc">Get tags array to save them</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="request->tags[]">
                                </div>
                              </li>

                            </ul>
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="Category"></a>
                        <h2>Category</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Category_index"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>index</h3></li>
                            <li>api/v1/categories</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Display a listing of the categories.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/categories" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="Dashboard"></a>
                        <h2>Dashboard</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Dashboard_index"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>index</h3></li>
                            <li>api/v1/dashboard/{date?}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc">Display a listing of the dashboard.</p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/dashboard/{date?}" type="GET">
                          <div class="endpoint-paramenters">
                            <h4>Parameters</h4>
                            <ul>
                              <li class="parameter-header">
                                <div class="parameter-name">PARAMETER</div>
                                <div class="parameter-type">TYPE</div>
                                <div class="parameter-desc">DESCRIPTION</div>
                                <div class="parameter-value">VALUE</div>
                              </li>
                                                           <li>
                                <div class="parameter-name">date$date</div>
                                <div class="parameter-type">\date</div>
                                <div class="parameter-desc">get date of activity and save them</div>
                                <div class="parameter-value">
                                    <input type="text" class="parameter-value-text" name="date$date">
                                </div>
                              </li>

                            </ul>
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>


                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
