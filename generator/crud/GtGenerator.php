<?php
namespace app\generator\crud;

use yii\gii\generators\crud\Generator;

class GtGenerator extends Generator
{
    /**
     * Generates column format
     * @param \yii\db\ColumnSchema $column
     * @return string
     */
    public function generateColumnFormat($column)
    {
        if ($column->phpType === 'boolean') {
            return 'boolean';
        }
        
        if ($column->type === 'text') {
            return 'ntext';
        }
        
        if (stripos($column->name, 'time') !== false && $column->phpType === 'integer') {
            return 'datetime';
        }
        
        if (stripos($column->name, '_at') !== false && $column->phpType === 'integer') {
            return 'datetime';
        }
        
        if (stripos($column->name, 'email') !== false) {
            return 'email';
        }
        
        if (preg_match('/(\b|[_-])url(\b|[_-])/i', $column->name)) {
            return 'url';
        }
        
        return 'text';
    }
}

