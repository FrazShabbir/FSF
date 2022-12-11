<a href="{{route('admin.dashboard')}}" class="header-logo">
    <img src="{{asset(fromSettings('logo') ??'backend/images/fs_logo.png')}}" class="img-fluid rounded" alt="">
    <span>{{fromSettings('short_title')??'FSF'}}</span>
</a>