<?php

namespace Socialog\Mapper;

use Exception;
use Socialog\Entity\Comment as CommentEntity;
use Socialog\Entity\EntityInterface;

/**
 * Comments Mapper
 */
class CommentMapper extends AbstractDoctrineMapper
{
    protected $entityName = 'Socialog\Entity\Comment';

    /**
     * Return all comments by a given Entity
     *
     * @param \Socialog\Entity\EntityInterface $entity
     * @return array
     * @throws Exception
     */
    public function findByEntity(EntityInterface $entity)
    {
        $sl = $this->getServiceLocator();
        $config = $sl->get('config');

        $entityClassname = get_class($entity);

        if ( ! isset($config['socialog']['entity_type'][$entityClassname])) {
            throw new Exception('Unknown entity type given: ' . $entityClassname );
        }

        $typeId = $config['socialog']['entity_type'][$entityClassname];

        return $this->getRepository()->findBy(
            array(
                'entityId'      => $entity->getId(),
                'entityType'    => $typeId,
            ),
            array('date' => 'DESC')
        );
    }

    /**
     * Find a comment by ID
     *
     * @param  integer $id
     * @return \Socialog\Entity\Comment
     */
    public function findById($id)
    {
        return $this->getRepository()->find($id);
    }

    /**
     * @param \Socialog\Entity\Comment $comment
     */
    public function save(CommentEntity $comment)
    {
       $this->getEntityManager()->persist($comment);
       $this->getEntityManager()->flush($comment);
    }
}
