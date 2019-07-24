<?php


namespace App\Controller\Component;


use App\Model\Entity\Device;
use Cake\Controller\Component;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;

class CDevicesComponent extends Component
{
    /**
     * @param Event $event
     * @param EntityInterface|Device $entity
     * @param \ArrayObject $options
     */
    public function beforeSave(Event $event, EntityInterface $entity, \ArrayObject $options){
        if(is_null($entity->user_id)){
            $user = $entity->Authentication->getIdentity()->getOriginalData();
            $entity->user = $user;
            $entity->user_id = $user->id;
            $entity->setDirty('user_id');
        }
    }
}