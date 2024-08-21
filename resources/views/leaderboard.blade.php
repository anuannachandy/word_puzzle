
@if($leaderboardEntries->isNotEmpty())
<!-- table view start -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">LeaderBoard</p>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless" id="tbl_leaderboard">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>No. of Word</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaderboardEntries as $data)
                            <tr>
                                <td>{{$data->Student_ID}}</td>
                                <td class="font-weight-bold">{{$data->name}}</td>
                                <td>{{$data->number_of_words}}</td>
                                <td class="font-weight-medium">
                                    <div class="badge badge-success">{{$data->total_score}}</div>
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
<!-- table view end -->
 @endif
                