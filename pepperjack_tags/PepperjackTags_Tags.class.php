<?php

class PepperjackTags_Tags extends PerchAPI_Factory
{
    protected $table      = 'members_tags t';
    protected $table2     = PERCH_DB_PREFIX.'members_member_tags mt';
    protected $table3     = PERCH_DB_PREFIX.'members m';
	protected $pk         = 'tagID';
	protected $singular_classname = 'PepperjackTags_Tag';
	
	protected $default_sort_column = 't.tag';

    public function all($Paging=false)
    {
        $sql = 'SELECT t.tagID, t.tag, t.tagDisplay, COUNT(mt.memberID) AS count
                FROM ' . $this->table . ' LEFT OUTER JOIN ' . $this->table2 . ' ON t.tagID = mt.tagID';

        $sql .= ' GROUP BY t.tagID, t.tag, t.tagDisplay';

        if (isset($this->default_sort_column)) {
            $sql .= ' ORDER BY ' . $this->default_sort_column . ' '.$this->default_sort_direction;
        }

        $results = $this->db->get_rows($sql);

        return $this->return_instances($results);
    }

    public function get_zero_count() 
    {
        $sql = 'SELECT t.tagID, t.tag, t.tagDisplay, COUNT(mt.memberID) AS count
                FROM ' . $this->table . ' LEFT OUTER JOIN ' . $this->table2 . ' ON t.tagID = mt.tagID';

        $sql .= ' GROUP BY t.tagID, t.tag, t.tagDisplay HAVING count = 0';

        if (isset($this->default_sort_column)) {
            $sql .= ' ORDER BY ' . $this->default_sort_column . ' '.$this->default_sort_direction;
        }

        $results = $this->db->get_rows($sql);

        return $this->return_instances($results);
    }

    public function check_usage_and_find($id)
    {
        $sql    = 'SELECT COUNT(*) FROM ' . $this->table2 . ' WHERE ' . $this->pk . '='. $this->db->pdb($id);
        $count = $this->db->get_count($sql);

        if ($count == 0) {
            return $this->find($id);
        }

        return false;
    }

    public function get_members_by_tag($id)
    {
        $sql    = 'SELECT m.memberID, m.memberProperties, mt.tagExpires FROM ' . $this->table2 . ' LEFT OUTER JOIN ' . $this->table3 . ' ON mt.memberID = m.memberID WHERE mt.tagID=' . $this->db->pdb($id) . ' ORDER BY m.memberProperties';
        $results = $this->db->get_rows($sql);

        return $results;
    }
}