<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Filament\Exports\ProductExport;
use App\Filament\Imports\ProductImport;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\ImportAction::make()
            //     ->label('Nhập Excel')
            //     ->icon('heroicon-o-arrow-down-tray')
            //     ->importer(ProductImport::class)
            //     ->color('success')
            //     ->maxRows(1000)
            //     ->chunkSize(100),

            Actions\ImportAction::make()
                ->label('Nhập Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->importer(ProductImport::class)
                ->color('success')
                ->maxRows(1000)
                ->chunkSize(100)
                // ->acceptedFileTypes([
                //     'text/csv',
                //     'application/vnd.ms-excel',
                //     'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                // ])
                ->fileRules(['mimes:xlsx,csv,xls']),
            
            Actions\ExportAction::make()
                ->label('Xuất Excel')
                ->icon('heroicon-o-arrow-up-tray')
                ->exporter(ProductExport::class)
                ->color('info')
                ->fileName(fn (): string => 'products-' . date('Y-m-d-His'))
                ->columnMapping(false)
                ->formats([
                    \Filament\Actions\Exports\Enums\ExportFormat::Xlsx,
                    \Filament\Actions\Exports\Enums\ExportFormat::Csv,
                ]),
            
            Actions\CreateAction::make()
                ->label('Tạo sản phẩm')
                ->icon('heroicon-o-plus'),
        ];
    }
}