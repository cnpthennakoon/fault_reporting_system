<!DOCTYPE html>
<html lang="en">

    <head>
        @include('partials._head')
        @include('partials._css')
    </head>

    <body>

        @include('partials._nav')

        <div class="container is-fluid">
            <div class="section">
                <div class="columns">
                    <div class="column is-2">

                        <aside class="menu">
                            <p class="menu-label">
                                Faults Menu
                            </p>

                            <ul class="menu-list">
                                <li>
                                    <ul>
                                        <li><a href="/report">Report new Fault</a></li>
                                        <li><a href="{{ route('fault.index') }}">Reported Faults</a></li>
                                        <li><a href="{{ route('fault.completed') }}">Completed Faults</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </aside>

                    </div>

                <div class="column is-9">
                         @yield('content')
                </div>

                </div> <!-- end of container -->

            </div>
        </div>
        @include('partials._javascript')

        @yield('script')

    </body>
</html>