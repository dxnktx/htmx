<?php

namespace Modules\TripBooking\src\Repositories\Student;

use Modules\TripBooking\src\Repositories\RepositoryInterface;
use Modules\TripBooking\src\Http\Requests\Student\SearchStudentRequest;

interface StudentRepositoryInterface extends RepositoryInterface
{
    public function update($request);

    public function createApiStudent($response);

    public function search(SearchStudentRequest $request);

    public function export();
}
