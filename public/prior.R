library(rjson);

x1 <- commandArgs()[5];

xx1 <- fromJSON(x1);

control_ctr <- as.numeric(xx1["control_ctr"]);
experimental_ctr <- as.numeric(xx1["experimental_ctr"]);
power <- as.numeric(xx1["power"]);
p_value <- as.numeric(xx1["p_value"]);

result <- power.prop.test(p1=control_ctr, p2=experimental_ctr, power=power, sig.level=p_value, strict=TRUE)

xx1["control_ctr"] <- control_ctr;
xx1["experimental_ctr"] <- experimental_ctr;
xx1["result_n"] <- result$n;
cat(toJSON(c(xx1["control_ctr"],xx1["experimental_ctr"],xx1["result_n"])));
