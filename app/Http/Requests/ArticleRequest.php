<?php

namespace App\Http\Requests;

use App\Tag;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tagsId = Tag::pluck('id')->toArray();

        $rule = [
            'title' => 'required|min:3|max:140|unique:articles',
            'body' => 'required',
            'short_description' => 'required|max:255',
            'tags.*' => 'in:' . implode(',', $tagsId)
        ];

        if ($this->route()->getName() == 'news.update') {
            $rule['title'] = 'required|min:3|max:140|unique:articles,title,' . $this->route('article')->id;
        }

        return $rule;
    }
}
