<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BookFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $hp_cpdf = new Book();
        $hp_cpdf->setTitle("Harry Potter et la coupe de feu");
        $hp_cpdf->setAuthor ($this->getReference('author-rowling')) ;
        $hp_cpdf->addCategory($this->getReference('category-roman'));
        $hp_cpdf->addCategory($this->getReference('category-sf'));
        $hp_cpdf->setImage('hpelcdf.jpg');
        $hp_cpdf->setSlug('harry-potter-et-la-coupe-de-feu');
        $manager->persist($hp_cpdf);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [CategoryFixture::class, AuthorFixture::class];
    }
}