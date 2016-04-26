
#!/bin/bash
filename="image_config.txt"

while IFS='' read -r line || [[ -n "$line" ]]; do

IFS=\` read -r -a array <<< "$line"
if [ "$line" = "" ]; then
echo lineempty
else

file=${array[0]}
hash=${array[1]}

    echo $file$hash;
    output=$(ffmpeg -v warning -ss 2 -t 0.8 -i $file -vf scale=200:-1 -gifflags +transdiff -y $hash </dev/null);
    echo $output;
#    echo ${array[0]}${array[1]}${array[2]}
fi;
done < "$filename"

truncate -s 0 filename
