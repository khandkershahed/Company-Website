<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function feature1()
    {
        return $this->belongsTo(Feature::class, 'story1_id')
            ->select(['id', 'logo', 'badge', 'header', 'slug'])
            ->withDefault();
    }

    public function feature2()
    {
        return $this->belongsTo(Feature::class, 'story2_id')
            ->select(['id', 'logo', 'badge', 'header', 'slug'])
            ->withDefault();
    }

    public function feature3()
    {
        return $this->belongsTo(Feature::class, 'story3_id')
            ->select(['id', 'logo', 'badge', 'header', 'slug'])
            ->withDefault();
    }

    public function feature4()
    {
        return $this->belongsTo(Feature::class, 'story4_id')
            ->select(['id', 'logo', 'badge', 'header', 'slug'])
            ->withDefault();
    }

    public function feature5()
    {
        return $this->belongsTo(Feature::class, 'story5_id')
            ->select(['id', 'logo', 'badge', 'header', 'slug'])
            ->withDefault();
    }

    // Successes
    public function success1()
    {
        return $this->belongsTo(Success::class, 'success1_id')
            ->select(['id', 'title', 'image', 'description'])
            ->withDefault();
    }

    public function success2()
    {
        return $this->belongsTo(Success::class, 'success2_id')
            ->select(['id', 'title', 'image', 'description'])
            ->withDefault();
    }

    public function success3()
    {
        return $this->belongsTo(Success::class, 'success3_id')
            ->select(['id', 'title', 'image', 'description'])
            ->withDefault();
    }

    // Client Stories
    public function story1()
    {
        return $this->belongsTo(ClientStory::class, 'solution1_id')
            // ->select(['id', 'badge', 'image', 'title', 'header', 'slug'])
            ->select(['id', 'badge', 'title', 'header', 'slug'])
            ->withDefault();
    }

    public function story2()
    {
        return $this->belongsTo(ClientStory::class, 'solution2_id')
            ->select(['id', 'badge', 'title', 'header', 'slug'])
            ->withDefault();
    }

    public function story3()
    {
        return $this->belongsTo(ClientStory::class, 'solution3_id')
            ->select(['id', 'badge', 'title', 'header', 'slug'])
            ->withDefault();
    }

    public function story4()
    {
        return $this->belongsTo(ClientStory::class, 'solution4_id')
            ->select(['id', 'badge', 'title', 'header', 'slug'])
            ->withDefault();
    }

    // TechGlossy
    public function techglossy()
    {
        return $this->belongsTo(TechGlossy::class, 'techglossy_id')
            ->select(['id', 'badge', 'title', 'slug', 'short_des', 'image'])
            ->withDefault();
    }
}
