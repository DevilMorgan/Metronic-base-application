@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.apManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ap-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Cihaza Ait IP'ler
                        </th>
                        <td>
                            <div id="ip_adress">
                                <div class="loading">yükleniyor..</div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Interface Print
                        </th>
                        <td>
                            <div id="interface_print">
                                <div class="loading">yükleniyor..</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Monitoring
                        </th>
                        <td>
                            <div id="monitoring">
                                <div class="loading">yükleniyor..</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bridge Hosts
                        </th>
                        <td>
                            <div id="bridge_hosts">
                                <div class="loading">yükleniyor..</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ap-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    $(function(){
        $.ajax({
            type: 'GET',
            url: '{{ route('cmd.getAllIpAdress', ['id' => $apManagement->id]) }}',
            dataType: 'json',
            success: function (data) {
                $.each(data, function(index, element) {
                    $('#ip_adress').append($('<div>', {
                        text: element.address + " Network : " + element.network
                    }));
                });
            },
            complete: function(){
                $('.loading').hide();
            }
        });
        $.ajax({
            type: 'GET',
            url: '{{ route('cmd.getInterfacePrint', ['id' => $apManagement->id]) }}',
            dataType: 'json',
            success: function (data) {
                $.each(data, function(index, element) {
                    $('#interface_print').append($('<div>', {
                        text: element.name
                    }));
                });
            },
            complete: function(){
                $('.loading').hide();
            }
        });
        $.ajax({
            type: 'GET',
            url: '{{ route('cmd.getMonitoring', ['id' => $apManagement->id]) }}',
            dataType: 'json',
            success: function (data) {
                $.each(data, function(index, element) {
                    $('#monitoring').append($('<div>', {
                        text: element.name
                    }));
                });
            },
            complete: function(){
                $('.loading').hide();
            }
        });
    });
</script>
@endsection
