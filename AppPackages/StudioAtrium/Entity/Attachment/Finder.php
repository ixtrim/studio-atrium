<?php
namespace StudioAtrium\Entity\Attachment;

class Finder
{
	private $dao;
	private $total = 0;

	public function __construct(\Point7_CMS_Attachment_DAO_PDOMySQL $dao)
	{
		$this->dao = $dao;
	}

	/**
	 * Total matching rows from the last paginated profile query.
	 *
	 * @return int
	 */
	public function getTotal()
	{
		return (int) $this->total;
	}

	/**
	 * Homepage / list helpers share this method.
	 * Realizations list passes page as the 5th argument (int|numeric string);
	 * Index.php passes onlyMain (bool) + asArray as 5th/6th.
	 *
	 * @param string $profile
	 * @param bool $onlyPublished
	 * @param int $limit
	 * @param bool $withOwner
	 * @param mixed $onlyMainOrPage
	 * @param bool $asArray
	 * @return array
	 */
	public function getAttachmentsByProfile(
		$profile,
		$onlyPublished = true,
		$limit = 10,
		$withOwner = true,
		$onlyMainOrPage = false,
		$asArray = true
	) {
		$page = 1;
		$onlyMain = false;
		if (is_int($onlyMainOrPage) || (is_string($onlyMainOrPage) && ctype_digit($onlyMainOrPage))) {
			$page = max(1, (int) $onlyMainOrPage);
		} else {
			$onlyMain = (bool) $onlyMainOrPage;
		}

		$result = $this->dao->getAttachmentsByProfile(
			(string) $profile,
			(bool) $onlyPublished,
			(int) $limit,
			(bool) $withOwner,
			$onlyMain,
			(bool) $asArray,
			$page
		);
		$this->total = isset($result['total']) ? (int) $result['total'] : count($result['rows']);
		return $result['rows'];
	}

	/**
	 * Realizations curated UID list (from RealizationsList.php).
	 *
	 * @param string $profile
	 * @param array $uidList
	 * @param bool $onlyPublished
	 * @param int $limit
	 * @param int|string $page
	 * @return array
	 */
	public function getAttachmentsByProfileAndUid(
		$profile,
		array $uidList,
		$onlyPublished = true,
		$limit = 10,
		$page = 1
	) {
		$result = $this->dao->getAttachmentsByProfileAndUid(
			(string) $profile,
			$uidList,
			(bool) $onlyPublished,
			(int) $limit,
			max(1, (int) $page)
		);
		$this->total = isset($result['total']) ? (int) $result['total'] : count($result['rows']);
		return $result['rows'];
	}
}
