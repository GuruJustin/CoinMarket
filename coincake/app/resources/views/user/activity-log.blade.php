@extends('include.dashboard')
@section('content')
  <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">

                                    <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-title-group">
                                                <h6 class="nk-block-title title">Recent Activity</h6>
                                            </div>
                                            <div class="nk-block-des"><p>This information about the last login activity on your account.</p></div>
                                        </div>
                                    </div>
                                    <div class="card card-bordered">
                                        <table class="table table-ulogs">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="tb-col-os">
                                                        <span class="overline-title">Browser <span class="d-sm-none">/ IP</span></span>
                                                    </th>
                                                    <th class="tb-col-ip"><span class="overline-title">IP</span></th>
                                                    <th class="tb-col-time"><span class="overline-title">Time</span></th>
                                                    <th class="tb-col-action"><span class="overline-title">Location</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                @foreach($activity as $k=>$data)
                                                    <td class="tb-col-os">{{isset($data->details) ? $data->details : 'N/A'}}</td>
                                                    <td class="tb-col-ip"><span class="sub-text">{{isset($data->user_ip) ? $data->user_ip : 'N/A'}}</span></td>
                                                    <td class="tb-col-time"><span class="sub-text">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span></td>
                                                    <td class="tb-col-action">{{isset($data->location) ? $data->location : 'N/A'}}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    {{$activity->links()}}
                                </div>
                            </div>
                        </div>
                     @stop
