<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Note;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Note
 */
class NoteQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Note[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Note|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}