<?php

namespace App\Http\Livewire\DetailView;

use LaravelViews\Facades\UI;

class UserDetailViewWithMultipleComponents extends UserDetailViewWithActions
{
    /**
     * @param $model Model instance
     * @return Array Array with all the detail data or the components
     */
    public function detail($model)
    {
        return [
            UI::component('components.metrics', []),

            UI::attributes([
                'Avatar' => UI::avatar(asset('storage/' . $model->avatar)),
                'Name' => $model->name,
                'Email' => $model->email,
                'Active' => $model->active ? UI::icon('check', 'success') : UI::icon('slash', 'danger'),
                'Type' => ucfirst($model->type),
                'Created' => $model->created_at->diffForHumans(),
                'Updated' => $model->updated_at->diffForHumans(),
            ]),

            UI::component('components.gallery', []),
        ];
    }
}
