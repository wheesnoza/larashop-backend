<?php declare(strict_types=1);

namespace App\Frontend\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Src\Frontend\Product\Domain\ProductUuid;

final class ShowProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function uuid(): ProductUuid
    {
        return new ProductUuid($this->route('uuid'));
    }
}
