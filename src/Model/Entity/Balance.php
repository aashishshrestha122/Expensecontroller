<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Balance Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property int $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $status
 *
 * @property \App\Model\Entity\Expense[] $expenses
 */
class Balance extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'expenses' => true
    ];
}
