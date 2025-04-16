<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\SummaryReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('report')->middleware('auth')->group(function () {
    /**
     * Вывод списка всех отчётов
     * TODO: реализовать базу данных ссылками на отчёты, переработать route чтобы было удобнее работатоть(фабрика?)
     */
    Route::get('/', [ReportController::class, 'index'])->name('report.index');

    /**
     * Сводный отчёт
     */
    Route::get('/summary', [SummaryReportController::class, 'index'])->name('report.summary');
    Route::post('/summary', [SummaryReportController::class, 'report'])->name('report.creatSummary');
    Route::post('/summary/export', [SummaryReportController::class, 'export'])->name('report.summaryExport');


});
