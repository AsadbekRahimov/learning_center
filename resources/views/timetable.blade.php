<link rel="stylesheet" type="text/css" href="{{ asset('styles/timetable.css') }}">

<div class="tab">
    <button class="tablinks" onclick="openRoom(event, 'lessons')">Bugungi darslar</button>
    @foreach($rooms as $room)
        <button class="tablinks" onclick="openRoom(event, '{{ $room->name }}')">{{ $room->name }}</button>
    @endforeach
</div>

<div id="lessons" class="tabcontent">
    <section class="timeline_area section_padding_130">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Timeline Area-->
                    <div class="apland-timeline-area">
                        @foreach($rooms as $room)
                            @php
                                //$groups = \App\Models\GroupRoom::query()->where('room_id', $room->id)->whereNotIn('group_id', $lesson_ids)->orderBy('time', 'ASC')->get();
                                //$groups = $room->groups()->where('room_id', $room->id)->whereNotIn('group_id', $lesson_ids)->orderBy('time', 'ASC')->get();
                                $count = 1;
                            @endphp
                            <div class="single-timeline-area">
                                <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                    <p>{{ $room->name }}</p>
                                </div>
                                <div class="row">
                                    @foreach($room->room_groups($lesson_ids) as $group)
                                        @php
                                            $time = \App\Models\GroupRoom::getTimeline($group->time, $group->duration);
                                        @endphp
                                        @if((in_array(date('l'), \App\Models\Group::ODD_DAYS) && $group->group->day_type == 'odd') || (in_array(date('l'), \App\Models\Group::EVEN_DAYS) && $group->group->day_type == 'even'))
                                            @if($count < 4)
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                        <div class="timeline-icon"><i class="fa fa-id-card" aria-hidden="true"></i></div>
                                                        <div class="timeline-text">
                                                            <h6><a href="{{ route('addLesson', ['id' => $group->group->id]) }}">{{ $group->group->name }}</a></h6>
                                                            <p>{{ $time }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@foreach($rooms as $room)
    <div id="{{ $room->name }}" class="tabcontent">
        <div class="container py-7">
            <div class="row">
                <div class="col-lg-4 mb-3" id="Friday, Nov 13th">
                    <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                        Toq kunlar
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
                        @foreach($room->groups as $group)
                            @php
                                $time = \App\Models\GroupRoom::getTimeline($group->time, $group->duration);
                                $name = $group->group->name;
                                $group_id = $group->group_id;
                                $teacher = $group->group->teacher->name;
                                $teacher_id = $group->group->teacher_id;
                            @endphp
                            @if($group->group->day_type === 'odd')
                                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">{{ $time }}</span> -
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}">{{ $name }}</a></p>
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> O'qituvchi: {{ $teacher }} </a>
                                        <a href="{{ route('deleteGroupRoom', ['id' => $group->id]) }}" style="color: red" onclick="return confirm('Rostdan xam o\'chirmoqchimisiz?')">O'chirish</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-4 mb-3" id="Saturday, Nov 14th">
                    <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                        Juft kunlar
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
                        @foreach($room->groups as $group)
                            @php
                                $time = \App\Models\GroupRoom::getTimeline($group->time, $group->duration);
                                $name = $group->group->name;
                                $group_id = $group->group_id;
                                $teacher = $group->group->teacher->name;
                                $teacher_id = $group->group->teacher_id;
                            @endphp
                            @if($group->group->day_type === 'even')
                                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">{{ $time }}</span> -
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}">{{ $name }}</a></p>
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> O'qituvchi: {{ $teacher }} </a>
                                        <a href="{{ route('deleteGroupRoom', ['id' => $group->id]) }}" style="color: red" onclick="return confirm('Rostdan xam o\'chirmoqchimisiz?')">O'chirish</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script src="{{ asset('scripts/timetable.js') }}" type="text/javascript"></script>
