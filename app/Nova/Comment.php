<?php

namespace App\Nova;

use App\Enums\Book\ReadingSource;
use App\Nova\Filters\DateRangeFilter;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class Comment extends Resource
{
    public static $model = 'App\Models\Comment';

    public static $title = 'id';

    public static $search = [
        'id', 'content'
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Content')->sortable()->rules('required', 'max:255'),
            MorphToMany::make('Likes', 'likes', User::class)
                ->fields(fn($request, $related) => [
                    Text::make('Like', 'like')->filterable(),
                ]),
            MorphToMany::make('Emojis', 'emojis', User::class)
                ->fields(fn($request, $related) => [
                    Text::make('Emoji', 'emoji')->filterable(),
                ]),
        ];
    }
}
