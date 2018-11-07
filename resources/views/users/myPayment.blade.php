@extends('layouts.app')

@section('content')
    <?php
    //die();
    $user = auth()->user();
    ?>
    <div class="container">
        <div class="row">


            <div style="padding-left: 12px;">
                <a href="{!! route('order') !!}" class="btn btn-sm btn-warning">Place New Order</a>
            </div>

            @include('users.globalStat')




            <div class="col-xs-12 general-stats">
                <h3 class="box-title">My Payments</h3>
                <div class="box box-info">
                    <div class="box-header with-border">

                        <div class="box-tools pull-right"> </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Transaction. N°</th>
                                    <th>Transaction amount</th>
                                    <th>Comments</th>
                                    <th>date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($user->historique) > 0)
                                    @foreach($user->historique as $ht)
                                        <tr>
                                            <td> {!! "TR".sprintf("%05d", $ht->id) !!}</td>
                                            <td>{!! config('app.currency_sombolHTML') !!} {!! $ht->montant !!}</td>
                                            <td>{!! $ht->description !!}</td>
                                            <td>{!! $ht->created_at->format('d M. Y') !!} at {!! $ht->created_at->format('H:i A') !!}</td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" style="text-align: center"> No transaction !!! </td>

                                    </tr>

                                @endif

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{!! route('order') !!}" class="btn btn-sm btn-warning btn-flat pull-left">Place New Order</a>
                        <a href="{!! route('home') !!}" class="btn btn-sm btn-default btn-flat pull-right">Back</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>





        </div>
    </div>

@endsection
