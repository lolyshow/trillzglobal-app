@extends('Layouts.layout')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Naijago App</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Campaign Tables</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Campaign Tables</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <p class="text-muted font-14">
                            
                        </p>
                        <div class="tab-content">
                            <div class="table-responsive">
                                <div class="tab-pane show active" id="scroll-horizontal-preview">
                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th> Type</th>
                                                <th>Banner</th>
                                                <th> Description</th>
                                                <th>Video url</th>
                                                <th>Created by</th>
                                                <th> Address</th>
                                                <th>Phone </th>
                                                <th>Target distance</th>
                                                <th>User</th>
                                                <th>Sponsor</th>
                                                <th>Target amount</th>
                                                <th>Amount per km</th>
                                                <th>First price</th>
                                                <th> Second price</th>
                                                <th>THird price </th>
                                                <th>Amount raised</th>
                                                <th>Runner</th>
                                                <th>Status</th>
                                                <th>Entry date</th>
                                                <th>Modified date</th>
                                                <th>More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#staticBackdrop">
                                                        <span class="fa fa-eye"></span>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                                        data-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">More
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="" action="">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="get">Get</label>
                                                                            <input type="text" name="reference" value=""
                                                                                class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="second">Second</label>
                                                                            <input type="text" name="reference" value=""
                                                                                class="form-control">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        name="submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div>
@endsection
