<?PHP
//�������ڱ���Ա�Goods�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
class Goods  {
  public $GoodsId;				// ��¼���
  public $GoodsName;			// ��Ʒ����
  public $TypeId;				// ���ͱ��
  public $SaleOrBuy;			// �������ͣ�1��ʾת�ã�2��ʾ��
  public $GoodsDetail;			// ��Ʒ˵��
  public $ImageURL;				//  ͼƬ���ӵ�ַ
  public $Price;				//  ת�ü۸�
  public $StartTime;			// ��ʼʱ��
  public $OldNew;				// �¾ɳ̶�
  public $Phone;			   // ��ϵ��ʽ
  public $IsOver;				// �Ƿ������1��ʾ������2��ʾδ����
  public $OwnerId;				// �����û���
  public $ClickTimes;		    // �������
  var $conn;

  function __construct() {
	// �������ݿ�
	$this->conn = mysqli_connect("localhost", "root", "", "2shou"); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }
		
  function __destruct() {
	// �ر�����
	mysqli_close($this->conn);
  }

  // ��ȡ��Ʒ��Ϣ
  function GetGoodsInfo($id)  {
	// ���ò�ѯ��SELECT���
 	$sql = "SELECT * FROM Goods WHERE GoodsId='" . $id ."'";
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	// ��ȡ��������
	if($row = $results->fetch_row()) {
	  $this->GoodsId = id;
	  $this->TypeId = $row[1];
	  $this->SaleOrBuy = $row[2];
      $this->GoodsName = $row[3];
	  $this->GoodsDetail = $row[4];
	  $this->ImageURL = $row[5];
	  $this->Price = $row[6];
	  $this->StartTime = $row[7];
	  $this->OldNew = $row[8];
	  $this->Phone = $row[9];
	  $this->IsOver = $row[10];
	  $this->OwnerId = $row[11];
	  $this->ClickTimes = $row[12];
	}
	else  {
	  $GoodsId=0;
	}
  }

  // ���ݲ�ѯ������ȡ������Ʒ��Ϣ�����ؽ����
  function GetGoodslist($cond)  {
	// ���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Goods" . $cond . " ORDER BY StartTime DESC";
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	return $results;
  }

  // ��ȡǰn��������ӵ���Ʒ
  function GetTopnNewGoods($n)  {
	// ���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Goods WHERE IsOver=0 ORDER BY StartTime DESC LIMIT 0," . $n;
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	return $results;
  }

  // ��ȡǰn�����ܹ�ע����Ʒ
  function GetTopnMaxClick($n)  {
	// ���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Goods WHERE IsOver=0 ORDER BY ClickTimes DESC, StartTime DESC LIMIT 0," . $n;
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	return $results;
  }

  // �ж�ָ����Ʒ�����Ƿ����
  function HaveGoodsType($tid)  {
	//���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Goods WHERE TypeId=" . $tid;
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	if($row = $results->fetch_row()) 
  	  $exist = true;
	else
	  $exist = false;
	return $exist;
  }

  // �����Ϣ
  function insert()  {
    $sql = "INSERT INTO Goods (TypeId, SaleOrBuy, GoodsName, GoodsDetail, ImageUrl, Price, StartTime, OldNew, Phone, IsOver, OwnerId, ClickTimes) VALUES (" . $this->TypeId. "," . $this->SaleOrBuy . ",'" . $this->GoodsName . "','" . $this->GoodsDetail . "','" . $this->ImageUrl . "','" . $this->Price . "','" . $this->StartTime . "','" . $this->OldNew . "','" . $this->Phone . "',0,'" . $this->OwnerId . "',0)";
	//ִ��SQL���
	$this->conn->query($sql);
  }

  function update($id)  {
    $sql = "UPDATE Goods SET GoodsName='" . $this->GoodsName . "', TypeId=" . $this->TypeId . ", GoodsDetail='" . $this->GoodsDetail . "', Price='" . $this->Price . "', OldNew='" . $this->OldNew . "', Phone='" . $this->Phone . "' WHERE GoodsId=" . $id;
	//ִ��SQL���
	$this->conn->query($sql);
  }

  function Add_ClickTimes($id)  {
    $sql = "UPDATE Goods SET ClickTimes=ClickTimes+1 WHERE GoodsId=" . $id;
	$this->conn->query($sql);
  }
  
  function SetOver($id)  {
    $sql = "UPDATE Goods SET IsOver=1 WHERE GoodsId=" . $id;
	$this->conn->query($sql);
  }

  // ����ɾ����Ϣ
  function delete($id) {
	$sql = "DELETE FROM Goods WHERE GoodsId IN (" . $id . ")";
	$this->conn->query($sql);
  }
}
?>