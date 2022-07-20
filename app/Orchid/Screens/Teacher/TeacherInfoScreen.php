<?php

namespace App\Orchid\Screens\Teacher;

use App\Models\Teacher;
use Orchid\Screen\Screen;

class TeacherInfoScreen extends Screen
{
    public $teacher;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Teacher $teacher): iterable
    {
        return [
            'teacher' => $teacher,
        ];
    }

    public function description(): ?string
    {
        return 'Filial: ' . $this->teacher->branch->name;
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->teacher->name;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    public function permission(): ?iterable
    {
        return [
            'platform.teacherInfo'
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [];
    }
}
