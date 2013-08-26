<?php

//
//$tickets = getTickets();
//foreach ($tickets as $id => $field)
//{
//    $tickets[$id]['activity'] = array();
//}
// save($tickets);
//die;
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    create();
    echo json_encode('true');
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_REQUEST['delete']) AND $_REQUEST['delete'] == 'true')
    {
        delete();
    }
    else
    {
        edit();
    }
    echo json_encode('true');
}
else
{
    $tickets = getTickets();

    if (isset($_REQUEST['id']))
    {
        echo json_encode($tickets[$_REQUEST['id']]);
    }
    else
    {
        echo json_encode(array_values($tickets));
    }
}

/*
 *  FUNCTIONS
 */

function create()
{
    $tickets = getTickets();
    $fields = getFields();
    $id = count($tickets) + 1;
    parse_str(file_get_contents("php://input"), $post_vars);

    $new = array();
    foreach ($fields as $field)
    {
        $new[$field] = $post_vars[$field];
    }

    $status = getStatusArray();
    $priority = getPriorityArray();
    $type = getTypeArray();

    if ($status[$new['status_id']])
    {
        $new['status'] = $status[$new['status_id']];
    }
    if ($priority[$new['priority_id']])
    {
        $new['priority'] = $priority[$new['priority_id']];
    }
    if ($type[$new['type_id']])
    {
        $new['type'] = $type[$new['type_id']];
    }

    $new['id'] = $id;
    $tickets[$id] = $new;

    save($tickets);
}

function edit()
{
    $tickets = getTickets();
    $fields = getFields();
    $id = $_REQUEST['id'];

    if (!isset($tickets[$_REQUEST['id']]['activity']))
    {
        $tickets[$_REQUEST['id']]['activity'] = array();
    }

    foreach ($fields as $field)
    {
        if (isset($_REQUEST[$field]))
        {
            $activity = array();
            if ($tickets[$_REQUEST['id']][$field] != $_REQUEST[$field])
            {
                if (in_array($field, array('status_id', 'type_id', 'priority_id')))
                {
                    $method = 'get' . ucfirst(str_replace('_id', '', $field)) . 'Name';
                    $activity['field'] = ucfirst(str_replace('_id', '', $field));
                    $activity['change'] = $method($tickets[$_REQUEST['id']][$field]) . ' -> ' . $method($_REQUEST[$field]);
                }
                else
                {
                    $activity['field'] = $field;
                    $activity['change'] = $tickets[$_REQUEST['id']][$field] . ' -> ' . $_REQUEST[$field];
                }


                if (isset($_REQUEST['comment']))
                {
                    $activity['comment'] = $_REQUEST['comment'];
                }

                $activity['date'] = date("F j, Y, g:i a");
                $activity['user'] = $_SESSION['user_name'];
            }

            $tickets[$_REQUEST['id']][$field] = $_REQUEST[$field];

            if (count($activity))
            {
                $tickets[$_REQUEST['id']]['activity'][] = $activity;
            }
        }
    }

    $status = getStatusArray();
    $priority = getPriorityArray();
    $type = getTypeArray();

    if ($status[$tickets[$id]['status_id']])
    {
        $tickets[$id]['status'] = $status[$tickets[$id]['status_id']];
    }
    if ($priority[$tickets[$id]['priority_id']])
    {
        $tickets[$id]['priority'] = $priority[$tickets[$id]['priority_id']];
    }
    if ($type[$tickets[$id]['type_id']])
    {
        $tickets[$id]['type'] = $type[$tickets[$id]['type_id']];
    }

    save($tickets);
}

function delete()
{
    $tickets = getTickets();
    unset($tickets[$_REQUEST['id']]);
    save($tickets);
}

function save($tickets)
{
    file_put_contents(getFilename(), serialize($tickets));
}

function getTickets()
{
    return unserialize(file_get_contents(getFilename()));
}

function getFilename()
{
    return 'data/tickets.json';
}

function getFields()
{
    return array('id', 'title', 'description', 'status_id', 'priority_id', 'type_id');
}

function getStatusArray()
{
    return array(1 => 'NEW', 2 => 'APPROVED', 3 => 'CANCELLED', 4 => 'REJECTED', 5 => 'DONE');
}

function getPriorityArray()
{
    return array(1 => 'Critical', 2 => 'High', 3 => 'Medium', 4 => 'Low');
}

function getTypeArray()
{
    return array(1 => 'Applications', 2 => 'Connectivity', 3 => 'Hardware', 4 => 'Merchandising', 5 => 'Security');
}

function getStatusName($id)
{
    $data = getStatusArray();
    if (isset($data[$id]))
    {
        return $data[$id];
    }
}

function getPriorityName($id)
{
    $data = getPriorityArray();
    if (isset($data[$id]))
    {
        return $data[$id];
    }
}

function getTypeName($id)
{
    $data = getTypeArray();
    if (isset($data[$id]))
    {
        return $data[$id];
    }
}

//$tickets = array(
//    1 =>
//    array('id' => '1', 'title' => 'title1', 'description' => 'c description1', 'status_id' => '3', 'priority_id' => '2', 'type_id' => '2'),
//    2 =>
//    array('id' => '2', 'title' => 'title2', 'description' => 'b description2', 'status_id' => '1', 'priority_id' => '1', 'type_id' => '1'),
//    3 =>
//    array('id' => '3', 'title' => 'title3', 'description' => 'a description3', 'status_id' => '2', 'priority_id' => '3', 'type_id' => '3')
//);
//file_put_contents($filename, serialize($tickets));die;

