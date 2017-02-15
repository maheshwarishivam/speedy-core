<?php

/**
 * Class UserPoPo
 */
class UserPoPo extends BasePoPo{
    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $name;
	
	/**
     * @var
     */
    public $code;
   
    /**
     * @var
     */
    public $version;
	
	/**
     * @var
     */
    public $image;
	
	/**
     * @var
     */
	public $createdDate;
	
	/**
     * @var
     */
    public $modifiedDate;
	
	/**
     * @var
     */
    public $categories;
	
	/**
     * @var
     */
    public $createdBy;
	
	/**
     * @var
     */
    public $courseStructure;
	
	/**
     * @var
     */
    public $courseQuiz;
	
	/**
     * @var object
     */
    public $details;
	
	
   
   
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
	
	public function getCode() {
        return $this->code;
    }
	
	public function getVersion() {
        return $this->version;
    }
	
	public function getImage() {
        return $this->image;
    }
	
	public function getCreatedDate() {
        return $this->createdDate;
    }
	
	public function getModifiedDate() {
        return $this->modifiedDate;
    }
	
	public function getCategories() {
        return $this->categories;
    }
	
	public function getCreatedBy() {
        return $this->createdBy;
    }
	
	public function getCourseStructure() {
        return $this->courseStructure;
    }
	
	public function getCourseQuiz() {
        return $this->courseQuiz;
    }
	
    public function setDetails($obj) {
        $this->name = $obj['name'];
        $this->code = $obj['code'];
    }
	
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }
	
	public function setCode($code)
	{
		$this->code = $code;
	}	
	
	public function setVersion($version) {
        $this->version = $version;
    }
	
	public function setImage($image) {
        $this->image = $image;
    }
	
	public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
    }
	
	public function setModifiedDate($modifiedDate) {
        $this->modifiedDate = $modifiedDate;
    }
	
	public function setCategories($categories) {
        $this->categories = $categories;
    }
	
	public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }
	
	public function setCourseStructure($courseStructure) {
        $this->courseStructure = $courseStructure;
    }
	
	public function setCourseQuiz($courseQuiz) {
        $this->courseQuiz = $courseQuiz;
    }
}
?>