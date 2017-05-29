<?PHP

namespace Istic\DemesneBundle\Entity\BaseEntities;

trait TrackedEntityTrait {
	public function updatedTimestamps()
	{
	    $this->setModifiedAt(new \DateTime(date('Y-m-d H:i:s')));

	    if($this->getCreatedAt() == null)
	    {
	        $this->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
	    }
	}
}