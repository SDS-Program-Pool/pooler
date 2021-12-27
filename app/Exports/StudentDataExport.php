<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentDataExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            '#',
            'User',
            'Date',
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->id,
            $user->id,
        ];
    }

    public function query()
    {
        return User::user();
    }
}
