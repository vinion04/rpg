using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;
using UnityEngine.UI;

public class CreateAvatar : MonoBehaviour
{
    public TMPro.TMP_InputField nameInput;
    public TMPro.TMP_Dropdown avatarClassDropdown;
    public Slider experienceSlider;
    public TMPro.TMP_Dropdown itemDropdown;
    public Button submitButton;

    // Start is called before the first frame update
    void Start()
    {
        submitButton.onClick.AddListener(Submit);
    }

    // Update is called once per frame
    void Submit()
    {
        string name = nameInput.text;
        string avatarClass = avatarClassDropdown.options[avatarClassDropdown.value].text;
        float experience = experienceSlider.value;
        string item = itemDropdown.options[itemDropdown.value].text;

        Debug.Log(name + " " + avatarClass + " " + experience + "  " + item);

        //connect to server and send data over
    }
}
