<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNameCity()
    {
        return $this->name_city;
    }

    /**
     * @param mixed $name_city
     */
    public function setNameCity($name_city): void
    {
        $this->name_city = $name_city;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param mixed $postal_code
     */
    public function setPostalCode($postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name_city;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $postal_code;


    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="city")
     */
    private $locations;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setCity($this);
        }
        return $this;
    }
  
  public function removeLocation(Location $location): self
    {
        if ($this->locations->contains($location)) {
            $this->locations->removeElement($location);
            // set the owning side to null (unless already changed)
            if ($location->getCity() === $this) {
                $location->setCity(null);
            }
        }
        return $this;
    }
  
    /**
     * @ORM\OneToMany(targetEntity=Event::class, mappedBy="city")
     */
    private $events;

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setCity($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getCity() === $this) {
                $event->setCity(null);
            }
        }

        return $this;
    }

}
