<?php

namespace Alura\Calisthenics\Domain\Video;

use Alura\Calisthenics\Domain\Student\Student;
use self;

interface VideoRepository
{
    public function add(Video $video): self;
    public function videosFor(Student $student): array;
}
