<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('network_yonetimi_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/device-managements*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-project-diagram c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.networkYonetimi.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('station_yonet_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/station-managements*") ? "c-show" : "" }} {{ request()->is("admin/station-raporlaris*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stationYonet.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('station_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.station-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/station-managements") || request()->is("admin/station-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fab fa-tencent-weibo c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.stationManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('station_raporlari_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.station-raporlaris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/station-raporlaris") || request()->is("admin/station-raporlaris/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fab fa-audible c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.stationRaporlari.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('ap_yonetimi_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/ap-managements*") ? "c-show" : "" }} {{ request()->is("admin/ap-managers*") ? "c-show" : "" }} {{ request()->is("admin/signalccq-managements*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-vector-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.apYonetimi.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('ap_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.ap-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ap-managements") || request()->is("admin/ap-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-wifi c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.apManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('ap_manager_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.ap-managers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ap-managers") || request()->is("admin/ap-managers/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.apManager.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('signalccq_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.signalccq-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/signalccq-managements") || request()->is("admin/signalccq-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-wifi c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.signalccqManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('switch_management_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/switch-lists*") ? "c-show" : "" }} {{ request()->is("admin/switch-yonets*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-pallet c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.switchManagement.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('switch_list_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.switch-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/switch-lists") || request()->is("admin/switch-lists/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fab fa-yelp c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.switchList.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('switch_yonet_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.switch-yonets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/switch-yonets") || request()->is("admin/switch-yonets/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-percentage c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.switchYonet.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('device_management_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.device-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/device-managements") || request()->is("admin/device-managements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-th-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.deviceManagement.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('signal_management_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/frequency-managers*") ? "c-show" : "" }} {{ request()->is("admin/signal-managers*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.signalManagement.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('frequency_manager_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.frequency-managers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/frequency-managers") || request()->is("admin/frequency-managers/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.frequencyManager.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('signal_manager_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.signal-managers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/signal-managers") || request()->is("admin/signal-managers/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.signalManager.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('nas_yonetimi_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/nas-managers*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.nasYonetimi.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('nas_manager_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.nas-managers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/nas-managers") || request()->is("admin/nas-managers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hdd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.nasManager.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ipam_managed_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/subnet-managements*") ? "c-show" : "" }} {{ request()->is("admin/pool-management-radius*") ? "c-show" : "" }} {{ request()->is("admin/pool-management-mikrotiks*") ? "c-show" : "" }} {{ request()->is("admin/ipam-reports*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ipamManaged.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('subnet_management_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.subnet-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subnet-managements") || request()->is("admin/subnet-managements/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.subnetManagement.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('pool_management_radiu_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.pool-management-radius.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pool-management-radius") || request()->is("admin/pool-management-radius/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.poolManagementRadiu.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('pool_management_mikrotik_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.pool-management-mikrotiks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pool-management-mikrotiks") || request()->is("admin/pool-management-mikrotiks/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.poolManagementMikrotik.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('ipam_report_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.ipam-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ipam-reports") || request()->is("admin/ipam-reports/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.ipamReport.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('abonelik_islemleri_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/musterilers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.abonelikIslemleri.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('musteriler_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.musterilers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/musterilers") || request()->is("admin/musterilers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.musteriler.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('speed_test_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/speed-test-raporlaris*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.speedTestManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('speed_test_raporlari_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.speed-test-raporlaris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/speed-test-raporlaris") || request()->is("admin/speed-test-raporlaris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.speedTestRaporlari.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('task_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/task-statuses*") ? "c-show" : "" }} {{ request()->is("admin/task-tags*") ? "c-show" : "" }} {{ request()->is("admin/tasks*") ? "c-show" : "" }} {{ request()->is("admin/tasks-calendars*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.taskManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('task_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.task.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tasks_calendar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks-calendars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tasksCalendar.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('sube_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/teams*") ? "c-show" : "" }} {{ request()->is("admin/performans-reports*") ? "c-show" : "" }} {{ request()->is("admin/sube-sikayets*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subeManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('performans_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.performans-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/performans-reports") || request()->is("admin/performans-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-flag-checkered c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.performansReport.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sube_sikayet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sube-sikayets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sube-sikayets") || request()->is("admin/sube-sikayets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subeSikayet.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-yelp c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
            <li class="c-sidebar-nav-item">
                <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "c-active" : "" }} c-sidebar-nav-link" href="{{ route("admin.team-members.index") }}">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-users">
                    </i>
                    <span>{{ trans("global.team-members") }}</span>
                </a>
            </li>
        @endif
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>