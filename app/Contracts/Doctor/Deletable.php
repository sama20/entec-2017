<?php
namespace App\Contracts\Doctor;


/**
 * Interface Deletable
 * @package App\Contracts\Doctor
 */
interface Deletable
{
    /**
     * Delete a doctor
     * @param $id
     * @return mixed
     */
    public function delete($id): bool;
}
