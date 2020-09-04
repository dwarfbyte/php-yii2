<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\NoteType;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\NoteType
 */
class NoteTypeQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return NoteType[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return NoteType|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}