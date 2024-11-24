<?php
namespace App\Services;

use App\Models\Examination;

class ExaminationService
{
    protected $exam;

    public function __construct(Examination $exam)
    {
        $this->exam = $exam;
    }
    public function uploadExamFile($params)
    {

        $examinationId = $params['examinationId']; // Lấy ID đề thi từ form

        try {
            $file = $params['examinationId'];

            $fileName = $file->getClientOriginalName();

            $this->processExcelFile($pathFile, $examinationId);
            return true;
        } catch (\Exception $e) {
            return false;

        }
    }
    private function processExcelFile($filePath, $examinationId)
    {

    }
}
