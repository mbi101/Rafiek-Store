<?php

namespace App\Services\Dashboard;

use App\Models\User;
use App\Utils\ImageManger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function __construct(protected readonly ImageManger $imageManger)
    {

    }

    public function create()
    {
    }
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image']) && $data['image'] != null) {
                $path = $this->imageManger->uploadSingleImage('users', $data['image'], 'public');
                $data['image'] = $path;
                if (isset($data['status'])) {
                    $data['status'] = $data['status'] == 'on' ? 1 : 0;
                }
            }
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);

            DB::commit();
            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error on create usre' . $th->getMessage(), [
                'Trace' => $th->getTraceAsString()
            ]);
            return throw $th;
        }
    }
    public function edit($id)
    {
    }


    public function update($request, $id)
    {


        try {
            DB::beginTransaction();

            if ($request->has('image')) {
                $this->imageManger->deleteImageFromLocal($request->image, true);
                $path = $this->imageManger->uploadSingleImage('users', $request->image, 'public');
                $data['image'] = $path;
            }

            isset($request->password) ? $data['password'] = bcrypt($request->password) : null;
            $data['status'] = $request->status == 'on' ? 1 : 0;
            $user = User::findOrFail($id);
            $user->update($data);

            DB::commit();
            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error on update usre' . $th->getMessage(), [
                'Trace' => $th->getTraceAsString()
            ]);
            return throw $th;
        }
    }


    public function changeStatus($user)
    {
        $user->status = !$user->status;
        $user->save();
        return $user;
    }
    public function destroy($id)
    {
    }

    // applay search

    public function userSearch(array $filters)
    {
        $sort_by = $filters['sort_by'] ?? 'name';
        $order_by = $filters['order_by'] ?? 'desc';
        $limit_by = $filters['limit_by'] ?? 10;

        $status = $filters['status'] ?? null;
        $keyword = $filters['keyword'] ?? null;

        $users = User::query()
            ->when($status != null, fn($q) => $q->where('status', $status))
            ->when($keyword != null, function ($q) use ($keyword) {
                $q->whereAny(['name', 'email'], 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy($sort_by, $order_by)
            ->paginate($limit_by)->withQueryString();

        return $users;
    }

}
