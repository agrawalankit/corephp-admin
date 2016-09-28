<?php
class ClassDb
{
	
	function __construct()
	{
		$this->database = AN_DATABASE_NAME;
		$this->username = AN_DATABASE_USER;
		$this->password = AN_DATABASE_PASSWORD;
		$this->hostname = AN_DATABASE_HOST;
		$this->Connect();
	}
	
	function __destruct()
	{
		$this->closeConnection();
	}
	
	private function Connect()
	{
		$this->databaseLink = mysqli_connect($this->hostname, $this->username, $this->password);
		if($this->databaseLink)
		{
			mysqli_select_db($this->databaseLink,$this->database); 
		}
		
	}
	
	 public function closeConnection()
	 {
	 	if($this->databaseLink)
		{
			mysqli_close($this->databaseLink);
		}
	 }
	
	public function checkLogin($aTable,$aUser,$aPass,$aGroup)
	{
		$aCon = " email = '{$aUser}' AND password = md5('{$aPass}') AND user_group_id = {$aGroup} AND status = 1";
		$aSql = "SELECT * FROM {$aTable} WHERE 1 AND {$aCon}"; 		
		$aRes = mysqli_query($this->databaseLink,$aSql);	
		$aRow = mysqli_fetch_assoc($aRes);
		return $aRow;
	}
	
	public function countRow($aTable,$aCon)
	{
		$aSql = mysqli_query($this->databaseLink,"SELECT COUNT(*) as count FROM {$aTable} WHERE 1 AND {$aCon}");
		$aCount = mysqli_fetch_assoc($aSql);
		return $aCount['count'];
	}
	
	public function processValues($aVals)
	{
		$aCon = '';
		if($aVals)
		{
			foreach($aVals as $aKey => $aVal)
			{
				$aCon .= "{$aKey} = '{$aVal}',";
			}
			$aCon = substr($aCon,0,-1);			
		}
		return $aCon;
	}
	
	public function processConditionValues($aVals)
	{
		$aCon1 = '';
		if($aVals)
		{
			foreach($aVals as $aKey => $aVal)
			{
				$aCon1 .= "{$aKey} = '{$aVal}' AND";
			}
			$aCon1 = substr($aCon1,0,-3);			
		}
		return $aCon1;
	}
	
	
	public function addData($aTable,$aVals)
	{
		$aCon = $this->processValues($aVals);
		$aSql = "INSERT INTO {$aTable} SET {$aCon}";
		mysqli_query($this->databaseLink,$aSql);		
		return mysqli_insert_id($this->databaseLink);
	}
	
	public function updatedData($aTable,$aVals,$aUpdate)
	{
		$aCon = $this->processValues($aVals);
		$aUpdate = $this->processConditionValues($aUpdate);
		$aSql = "UPDATE {$aTable} SET {$aCon} WHERE 1 AND {$aUpdate}";
		mysqli_query($this->databaseLink,$aSql);		
		return true;
	}
	
	public function getAllData($aTable,$aCon = '',$aOrder = '')
	{
		
		$aRows = array();
		$aSql = "SELECT * FROM {$aTable} WHERE 1 {$aCon} {$aOrder}";
		
		$aRes = mysqli_query($this->databaseLink,$aSql);		
		while($aRow = mysqli_fetch_assoc($aRes))
		{
			$aRows[] = $aRow;
		}	
		return $aRows;
	}
	
	public function getDataFromId($aTable,$aCon = '')
	{
		$aCon = $this->processConditionValues($aCon);
		$aSql = "SELECT * FROM {$aTable} WHERE 1 AND {$aCon}";
		$aRes = mysqli_query($this->databaseLink,$aSql);	
		$aRow = mysqli_fetch_assoc($aRes);
		return $aRow;
	}

	public function deleteData($aTable,$aCon)
	{
		$aCon = $this->processConditionValues($aCon);
		$aSql = "DELETE FROM {$aTable} WHERE 1 AND {$aCon}";
		mysqli_query($this->databaseLink,$aSql);		
		return true;
	}
	
	
	public function sendUrl($sUrl, $sMsg = null, $aParams = array())
	{
		if ($sMsg !== null)
		{
			$_SESSION['message'] = $sMsg;	
		}
		header("location:".$sUrl);
		exit;
	}
	
	
	
	


		
		
}

?>